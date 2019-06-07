# in the name of god
import urllib, re
htmlSource = urllib.urlopen("http://www.gsm.ir/item/mobile/group.action?_brand=Nokia").read()
Links = re.findall('<a href=(.*?)>.*?</a>',htmlSource)
for l in Links: 
     print (l) 
