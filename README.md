Google Analytics Slack notifications

Create a Google API key
https://console.developers.google.com/project

Create a Slack webhook
https://[yourslack].slack.com/services/new/incoming-webhook

Copy setup.php.example to setup.php and add in your information

Copy your Google API private key to this directory and name it "privatekey.p12"

Set up a cronjob to run dailydigest.php a little after noon EST. This is when Google Analytics has generally completed its update.