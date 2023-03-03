

1. Before booting up the included database script, create an database with the name sinus and import the script to that database.
  (things you might have to change before doing so, 
  a. open up xampp
  b. press config on the mysql row
  c. press the my.ini 
  d. when the document opens up press ctrl + f
  e. enter max_ and press enter
  f. you will land on the first max_allowed_packet=1M
  g. change this setting from 1M to 10M
  conclusion: and our database script will work correctly... we hope...

  max_allowed_packet=1M  <----------- change this setting here. from 1M to 10M)

2. More infomation in textfiles in folder files.
