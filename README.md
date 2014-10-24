# Google Analytics Slack notifications

## Setup

Create a Google API key
https://console.developers.google.com/project

Create a Slack webhook
https://yourslack.slack.com/services/new/incoming-webhook

Copy setup.example.php to setup.php and add in your information

Copy your Google API private key to this directory and name it "privatekey.p12"


## dailydigest.php

Reports daily pageviews in thousands for the previous day to #general, with a comparison against the same day in the previous week. Includes links to the two days' data in Google Analytics. 

**Example Output**

    DAILY DIGEST: Yesterday (Wednesday), we did ###k pageviews. Last Wednesday, we did ###k pageviews (+##k).

**Usage**

Set up a cronjob to run dailydigest.php a little after noon EST. This is when Google Analytics has generally completed its update. For sites with less activity, you may be able to run it at other times of the day.

**Example cron entry**

    0 15 * * * php /path/to/dailydigest.php >> /tmp/crontab.log


## toppostsrealtime.php

Reports the current real time stats the top URLs in #analytics. Excludes the root URL. Provides handy links to each URL and their individual real time statistics pages in Google Analytics. 

**Example Output**

    Current users on the site: ####

    Top posts:

    ###    brad-pitt-louie-c-k-and-zac  
    ##    a-ship-launch-goes-terribly-wr  
    ##    recaptioning-new-yor  
    ##    u-s-senator-to-internet-provi  
    ##    watch-moron-vs-metal-gate  
    ##    watch-photo-math-a-smartphon

**Example cron entry**

    */15 * * * * php /path/to/toppostsrealtime.php >> /tmp/crontab.log