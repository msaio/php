import requests
import json

from bs4 import BeautifulSoup 

f = open("listofURLoffical.txt", "r")
listUrl = f.read().split()
for url in listUrl:
    r = requests.get(url)
    soup = BeautifulSoup(r.text, 'html.parser')
    results = soup.find_all('h1', attrs={'class':'title pdTitle'})
    # get product's name
    # i = " ".join(results[0].text.split())
    i = results[0].text.strip()
    # get product's image
    results = soup.find_all('a', attrs={'class':'pdFancybox'})
    j = "https:"+results[0].find('img')['src']
    # get product's price
    results = soup.find_all('p', attrs={'class':'item price'})
    k = results[0].find('span', attrs={'id':'pdPriceNumber'}).text
    # add all to record
    record = {"name": i, "image":j, "price":k, "url":url}
    # record.append((i,j))
    f2 = open("hangchinhhieu.json", "a")
    f2.write(json.dumps(record)+"\n")
    f2.close()

f.close()

# y = '{"name":10, "image":20, "price":30}'
# x = json.loads(y)
# print(x["name"])
# x = json.dumps(record)
# print(type(x))
