"""
Need to install sshpass

pip3 install apache_log_parser
pip3 install pandas
pip3 install matplotlib

"""
import os
import apache_log_parser
import pandas as pd
import getpass
import matplotlib.pyplot as plt
import numpy as np
import matplotlib.dates as mdates
from collections import Counter
from datetime import datetime
from matplotlib.backends.backend_pdf import PdfPages


def get_log_file():
    """
    This function
    """
    uname = input("Clamv username = ")
    passwd = getpass.getpass("Password = ")

    passwd = str(passwd)

    st1 = 'sshpass -p '+passwd+' scp '+uname + \
        '@clabsql.clamv.jacobs-university.de:/../../var/log/apache2/access_log ./'
    os.system(st1)

    # get log files in the same directory as that of the script file
    return


def get_data_page(data, page):
    print("\n\nData for", page)

    store = []
    ip_address_list = []
    date_list = []
    browser_list = []

    for x in data:
        dicts = {}
        if((x['request_url']) == page):
            dicts['browser'] = x['request_header_user_agent__browser__family']
            dicts['ip_address'] = x['remote_host']
            dicts['date'] = x['time_received_isoformat']

            ip_address_list.append(x['remote_host'])
            date_list.append(x['time_received_isoformat'])
            browser_list.append(
                x['request_header_user_agent__browser__family'])

            store.append(dicts)
    

    # creates a dictionary in which key=one item and value = no. of times the item appears in the list
    return (ip_address_list, date_list, browser_list)


def timeline_plot(pdf,page, ip_address_list, date_list, browser_list):
    dates = [datetime.strptime(d[:10], "%Y-%m-%d") for d in date_list]
    
    # Choose some nice levels just to visualize the different
    levels = np.tile([-5, 5, -3, 3, -1, 1],
                    int(np.ceil(len(dates)/6)))[:len(dates)]

    # Create figure and plot a stem plot with the date
    fig, ax = plt.subplots(figsize=(8.8, 4), constrained_layout=True)
    ax.set(title="Log of page: " + page)

    ax.vlines(dates, 0, levels, color="tab:red")  # The vertical stems.
    ax.plot(dates, np.zeros_like(dates), "-o",
            color="k", markerfacecolor="w")  # Baseline and markers on it.

    # annotate lines
    for d, l, i, b in zip(dates, levels, ip_address_list, browser_list):
        ax.annotate(i+" " +b, xy=(d, l))

    # format xaxis with 1 day intervals
    ax.xaxis.set_major_locator(mdates.DayLocator(interval=1))
    ax.get_xaxis().set_major_formatter(mdates.DateFormatter("%d %m %Y"))
    plt.setp(ax.get_xticklabels(), rotation=30, ha="right")

    # remove y axis and spines
    ax.get_yaxis().set_visible(False)
    for spine in ["left", "top", "right"]:
        ax.spines[spine].set_visible(False)

    ax.margins(y=0.1)
    pdf.savefig()
    plt.close()
    

# main function starts here
def main():

    get_log_file()

    fil = open("access_log", "r")

    line_parser = apache_log_parser.make_parser(
        "%h %l %u %t \"%r\" %>s %b \"%{Referer}i\" \"%{User-Agent}i\"")
    # from the apache log website

    errors = []
    data = []
    log_line_data = {}

    for line in fil:
        # find returns -1 if it does not find the searched word in the line
        # since we only need the data for the main pages not css and images we search for the line that only has the main pages
        if (line.find('~tpham') != -1 and line.find('css') == -1 and line.find('js') == -1 and line.find('img') == -1):
            log_line_data = line_parser(line)

            if(int(log_line_data['status']) >= 400):  # all status > 400 are error
                # all the errors are stored in a separate list
                errors.append(log_line_data)

            data.append(log_line_data)

    page_list = []

    for x in data:
        if (x['request_url'] not in page_list):
            page_list.append(x['request_url'])

    with PdfPages("Access_log.pdf") as pdf:
        for page in page_list:
            ip_address_list, date_list, browser_list = get_data_page(data, page)
            timeline_plot(pdf, page, ip_address_list, date_list, browser_list)
            
    

main()
