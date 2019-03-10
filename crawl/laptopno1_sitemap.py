import requests
import json

from bs4 import BeautifulSoup

def get_price(link):
    r = requests.get(link)
    soup = BeautifulSoup(r.text,'html.parser')
    results = soup.find_all('p', attrs={'class':'item price'})
    price = results[0].find('span', attrs={'id':'pdPriceNumber'}).text
    return price

url = "http://laptopno1.com/sitemap.xml"
r = requests.get(url)
soup = BeautifulSoup(r.text, 'xml')
results = soup.find_all('url')
i = 1
while (i < len(results)):
    link = results[i].find('loc').text
    price = get_price(link)
    image = results[i].find('image:title').text
    title = results[i].find('image:loc').text
    print(i)
    print(link)
    print(price)
    print(image)
    print(title)
    i = i + 1
    record = {"link":link, "price":price, "imagelink":image, "title": title}
    f = open("laptopno1_sitemap.json", "a")
    f.write(json.dumps(record)+"\n")
    f.close()


