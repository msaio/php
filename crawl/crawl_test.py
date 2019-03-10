import requests
r = requests.get('https://news.sky.com/story/ukraine-bans-russian-men-from-entering-country-11567478')
from bs4 import BeautifulSoup

soup = BeautifulSoup(r.text, 'html.parser')
results = soup.find_all('ul', attrs={'class':'sdc-news-header__nav-group'})

for i in results:   
    j = i.find_all('li')
    for k in j:
        print (k.find('a')['href'])
# print (results)

print ('\n')
var = results[0].find('li')
print (var)
print ('\n')
var = results[0].find('li').contents[1]
print (var)
print ('\n')
var = results[0].find('li').contents[1].text
print (var)
print ('\n')

# var = str(results)
# print (var)

# file = open("output.txt","w")
# file.write(var)
# file.close()
heloo();

function heloo(){
        echo "Hello World";
}