# NASBox
NASBox Project

This Project aims to build a box containing a QNAP-NAS which will be set up in my cellar a.k.a. workshop. Since its dusty there, I want to put my NAS in a plastic box so it may be safe from the occasional enviromental hazard.

But it will get warm in any closed space so I will have to cut holes into the plastic box and install some fans. A Raspberry Pi will monitor the temperature, log it to a database and start up the fans if needed. As a side effect, I will be able to see a curve of the tempereatur (and maybe fan speed related to it...) via a website hostet by the Pi.

The front of the box will have a hole where some kind of filter medium will hold back all the nasty dust floating around in the air (at least, thats what I am hoping). At the back there will be two fans pulling the warm air out of the NASBox.

It will sport a display stating some basic info about the box (OLDE.py) like temperature, IP and maybe load of the Pi. I also have a nice aluminium knob that might be used for selecting stuff while the display is used to show a menu like structure - but currently I am not sure what I might use it for. The display and maybe a power control button will be set in a aluminium strip to make it look - awesome!

I also plan to connect the Pi to a real display / monitor and use it for "computer-related stuff in the workshop" like watching videos or listening to some music - wich means, I also have to think about speakers at some point.

# Explanation of the files
\- /OLED.py           This is used to draw the wanted Info onto the OLED. Also, the file is executed at boottime via cron

\- /mbe2db.py         This inserts the temperature and other data into the database. File is executed every 5m via cron

\- /web/index.php     This draws the graph on the control-website

\- /web/js/loader.js  loader.js from google

# Sources
Oh, there are a lot I glanced over and some I stole code from. AFAIR these are the most important ones (meaning: helped the most):
- For the OLED Display: https://www.raspberrypi-spy.co.uk/2018/04/i2c-oled-display-module-with-raspberry-pi/
- For general info about how to code stuff I somehow always end up at: https://stackoverflow.com
- some inspiration came from https://www.instructables.com/id/Raspberry-datalogger-with-Mysql-Highcharts/
- and all the others I forgot...
