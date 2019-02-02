import scrapy
import csv
import os
from random import choice
import pyodbc
#from pricetrack.items import PricetrackItem
class MySpider(scrapy.Spider):
    #connection to sql server check ANSI Driver version
    cnxnSt = pyodbc.connect("Driver={MySQL ODBC 8.0 ANSI Driver};Server=localhost;Database=chat_bot;UID=root;PWD=;")
    cursorUrls = cnxnSt.cursor()
    #self.cursorUrls.execute(('insert into data_urls(urls) values("{}");').format(url)).commit()
    #contains the list of urls that haven't been scraped checked today

    #sqlUrlList ="select product_url,id from product_urls where product_url not in(select product_url from product_detail WHERE day(DateUpdated)=day(now()) and month(DateUpdated)=month(now()) and year(DateUpdated)=year(now()) group by product_url) order by id" 
    #select product_url,id from product_urls where product_url not in(select product_url from product_detail WHERE day(DateUpdated)=day(now()) and month(DateUpdated)=month(now()) and year(DateUpdated)=year(now()))"
    #"SELECT product_url FROM pricetrack.testurl01 where product_url not in (select product_url from product_detail) order by product_url asc"
    '''
    cursorUrls.execute("select urls from data_urls")
    start_urls=[]
    for row in cursorUrls:
        start_urls.append(row[0])
    '''
    start_urls=['https://singaporelegaladvice.com/law-articles/divorce/',
                'https://singaporelegaladvice.com/law-articles/criminal-law/',
                'https://singaporelegaladvice.com/law-articles/inheritance/',
                'https://singaporelegaladvice.com/law-articles/defamation-and-harassment/',
                'https://singaporelegaladvice.com/law-articles/housing/',
                'https://singaporelegaladvice.com/law-articles/finding-lawyer/',
                'https://singaporelegaladvice.com/law-articles/personal-injury/',
                'https://singaporelegaladvice.com/law-articles/private-investigation/',
                'https://singaporelegaladvice.com/law-articles/debt-recovery/',
                'https://singaporelegaladvice.com/law-articles/traffic-accidents/',
                'https://singaporelegaladvice.com/law-articles/legal-procedures/',
                'https://singaporelegaladvice.com/law-articles/litigation-dispute-resolution/',
                'https://singaporelegaladvice.com/law-articles/consumer-law/',
                'https://singaporelegaladvice.com/law-articles/family-law/',
                'https://singaporelegaladvice.com/law-articles/general-election/',
                'https://singaporelegaladvice.com/law-articles/presidential-election/',
                'https://singaporelegaladvice.com/law-articles/legal-aid/',
                'https://singaporelegaladvice.com/law-articles/miscellaneous-topics/',
                'https://singaporelegaladvice.com/law-articles/setting-up-a-business-singapore/',
                'https://singaporelegaladvice.com/law-articles/running-a-business-in-singapore/',
                'https://singaporelegaladvice.com/law-articles/trade-mark-registration/',
                'https://singaporelegaladvice.com/law-articles/employment-law/',
                'https://singaporelegaladvice.com/law-articles/intellectual-property-law-singapore',
                'https://singaporelegaladvice.com/law-articles/legal-contracts',
                'https://singaporelegaladvice.com/law-articles/small-business/',
                'https://singaporelegaladvice.com/law-articles/litigation-dispute-resolution/',
                'https://singaporelegaladvice.com/law-articles/financing/',
                'https://singaporelegaladvice.com/law-articles/business-sale-and-purchase/']

    #url_id={}
    #stores the product_id as a dictionary in url_id
    #for row in cursorUrls:
    #    url1 =  row[0]
    #    id1 = row[1]
    #    if url1:
    #        start_urls.append(url1)
    #        url_id[url1]=id1
    
    name = 'chat_bot'
    #removes special characters and gets all words seperated by ~
    '''
    def get_words(self,word_check):
        
        words=""
        for element in word_check:
            element=element.strip()
            element=element.strip('\n')
            element=element.strip('\t')
            element=element.replace('<br>','')
            element=element.replace('\n','')
            element=element.replace('\t','')
            element=element.replace("'",'')
            element=element.strip()
            words+=(element+"~")
        if(words!=""):
            words=words[0:len(words)-1]        
        return words
    #removes all currency signs and stores prices in format: 11111.11 there are no commas before the decimal point and '.' symbolizes the decimal point
    def get_prices(self,mrp):
        #used if xpath doesn't have 'text()' in it
        if(mrp[0].find('<')!=-1):
            mrp[0]=mrp[0][mrp[0].find('>')+1:mrp[0].rfind('<')]
            
            mrp[0]=mrp[0].strip()
            
            mrp[0]=mrp[0].replace(u'\u00A3', u'')
            mrp[0]=mrp[0].replace(u'\u20ac', u'')                    
            
            mrp[0]=mrp[0].replace('EUR', '')
            
            mrp[0]=mrp[0].strip()
            
            mrp=mrp[0]
        #removing redundant characters
        else:
            
            mrp[0]=mrp[0].strip('\n')
            mrp[0]=mrp[0].replace(u'\u00A3', u'')
            mrp[0]=mrp[0].replace(u'\u20ac', u'')                    
            mrp[0]=mrp[0].replace('EUR', '')
            mrp[0]=mrp[0].strip()
            price=mrp[0]
        print(price)
        price=str(price)
        l = len(price)
        location2 = price.rfind('.')
        location = price.rfind(',')
        
        if(location!=-1 and (l-location-1) == 2):
            #reorganizes commas and fullstops in desired format case1: input= 10.000,01 output: 10000.01
            if(price.find('.')!=-1):
                price=price.replace('.','')
                price=price.replace(',','.')
                numbers=list(price)
            #reorganizes commas and fullstops in desired format case2: input= 10000,01 output: 10000.01    
            else:
                numbers=list(price)
                numbers[l-1-(2)]="."
        #reorganizes commas and fullstops in desired format case3: input= 10.000 output: 10000
        elif location == -1 and (l-location2-1) > 2:
            price=price.replace('.','')
            numbers=list(price)
        #reorganizes commas and fullstops in desired format case4: input= 10,000.01 or 10,000 output: 10000.01 or 100000
        else:
            numbers=list(price)
        price=""
        for number in numbers:
            if(number!=","):
                price+=number
                    

        return price
    #gets discount
    def get_discount(self, old, new,siteurl):
        print(repr(siteurl))
        if(old=='0' or old==''):
            discount=''
        else:
            try:
                discount = float(old)-float(new)
                discount=str(round(discount, 2))
                
            except:
                discount=""
        return discount
    '''       
    def parse(self, response):
        
        all_questions = response.xpath("//li[@class='learning-center-page--suboutline-li']/a/@href").extract()
        #all_questions = response.xpath("//h2/strong[1]/text()").extract()
        try:
            if response.request.meta['redirect_urls']:
                url=response.request.meta['redirect_urls'][0]
            else:
                url=response.request.url
        except:
            url=response.request.url         
        tag=url
        #tag = u[0:len(u)][u.rfind('/')+1::]
        if tag.rfind('/')==len(tag)-1:
            tag = tag[0:len(tag)-1]
        tag = tag[tag.rfind('/')+1::]
            #print(tag)
        
        #all_answers = 
        questions = []
        for question in all_questions:
            self.cursorUrls.execute(('insert into data_urls(urls,tags) values("{}","{}");').format(question, tag)).commit()
            #self.cursorUrls.execute(('insert into legal_data(question,url) values("{}","{}");').format(url, question)).commit()
            questions.append(question)
        '''
        #fetch()
        
        item=PricetrackItem()
        try:
            doc = response
            stat=doc.xpath('').extract()
            #gets website details from the database
            sql = "SELECT xpath_status,xpath_mrp,xpath_title,xpath_price,id,site_name, site_url,prod_desc,status,logo,currency FROM website_detail where status=1 and site_url=(select site_url from pricetrack.website_detail where '"+ response.request.url+"' like concat('%' ,site_url,'%'))"
            #print("\n1\n"+repr(response.request.meta))
            self.cursor.execute(sql)
            res = self.cursor.fetchone()
            #print(repr(res))
            print ('\n\n')
            #print (response.request.url)
            print ('\n\n')
            doc = response
            XPATH_status=res[0]
            stat=doc.xpath(XPATH_status).extract()
            
            #print(repr(res[5]))
            #case1: if x_path status points at the page when product is no longer available
            if res[5] == 'Thomman DE':
                if  not stat:
                    flag = True
                else:
                    flag=False
            #case2: if x_path status points at the situation when the product is out of stock
            elif res[5] == 'Bax-Shop DE':
                if  (not stat) and doc.xpath(res[3]).extract():
                    flag = True
                else:
                    flag=False
            #special_case: if x_path is same for all types of availability situations checks if the value is in stock in this case 'En Stock'
            elif res[5] == 'Sonovente COM':
                if stat:
                    if stat[0] == 'En Stock':
                        flag=True
                    else:
                        flag=False
                else:
                    flag=False   
            #ideal case: if status is true stock exists else stock doesn't exist     
            else:
                if stat:
                    flag=True
                else:
                    flag=False
            #case 1: when in stock
            if flag:
                XPATH_title=res[2]    
                XPATH_mrp=res[3]
                XPATH_oldmrp=res[1]
                
                print ('\n')
                #title 
                title = self.get_words(doc.xpath(XPATH_title).extract())
                    
                #print(repr(title))
                
                print ('\n')
                mrp=doc.xpath(XPATH_mrp).extract()
                #print (repr(mrp))
                if not mrp:
                    mrp=""
                else:
                    mrp=self.get_prices(mrp)
                    
                    
                if(XPATH_oldmrp!=''):    
                    oldmrp=doc.xpath(XPATH_oldmrp).extract()
                    #special case: since xpath is the same additional checks are required to identify the old price
                    if res[5] =='Woodbrass COM':
                        checker = doc.xpath('//div[@class="mt10 fwb tup fs28-sm"]/text()').extract()
                        if not checker:
                            oldmrp=False
                    if res[5] == 'Musicstore DE':
                            if(oldmrp):
                                if(oldmrp[0].find(":")!=-1 and oldmrp[0].find(u"\u20AC")!=-1):
                                    oldmrp[0]=oldmrp[0][oldmrp[0].find(':')+1:oldmrp[0].rfind(u"\u20AC")]
                                else:
                                    oldmrp=False
                            else: 
                                oldmrp=False
                    if not oldmrp:
                        oldmrp=""
                    
                    #special case price is stored in another index    
                    else:
                        if res[5] == 'Sonovente COM':
                            oldmrp[0]=oldmrp[2]
                        
                        #print ('\n\n')
                        #print(repr(oldmrp))
                        #print ('\n\n')
                        oldmrp=self.get_prices(oldmrp)
                #ideal case        
                else:
                    oldmrp=""
                XPATH_desc=res[7]
                if(XPATH_desc==""):
                    desc=""
                else:
                    desc=self.get_words(doc.xpath(XPATH_desc).extract())
            
                #print(repr(res[7]))
                discount=self.get_discount(oldmrp,mrp,res[6])
                #if the url is a redirected url retrieves that or retrieves the requested url
                try:
                    if response.request.meta['redirect_urls']:
                        url=response.request.meta['redirect_urls'][0]
                    else:
                        url=response.request.url
                except:
                    url=response.request.url            
                #exception case: For all amazon pages xpath for price and non availability is same so the value of non availability is hard coded
                if(mrp=="Currently unavailable."):
                    status="0"
                    quantity="0"
                    mrp=""
                    oldmrp=""
                    item['quantity'] = quantity
                    item['price'] = mrp
                    item['old_price'] = oldmrp
                    item['title'] = title
                    item['URL'] = url
                    item['status'] = status
                    item['productid']=self.url_id[url]
                    item['siteurl']=res[6]
                    item['active']=res[8]
                    item['desc']=desc
                    item['discount']=discount
                    item['currency']=res[10]
                    yield item
                #stores the values in item
                else:
                    status="1"
                    quantity="1"
                    #if(float(oldmrp)<=float(mrp)):
                    #    oldmrp=""
                    item['quantity'] = str(quantity)
                    item['price'] = mrp
                    item['old_price'] = oldmrp
                    item['title'] = str(title)
                    item['URL'] = url
                    item['status'] = int(status)
                    item['productid']=int(self.url_id[url])
                    item['siteurl']=res[6]
                    item['active']=res[8]
                    item['desc']=desc
                    item['discount']=discount
                    item['currency']=res[10]
                #  yield {'price':mrp[0],'old_price':oldmrp,'title':title,'URL':response.request.url,'quantity':quantity,'status':status,}
                    yield item
            #case2: when product is out of stock
            elif doc.xpath(res[2]).extract() or stat:
                #
                
                #
                if res[5] == 'Thomman DE':
                    title=str(stat[0])
                    #print(repr(title))
                    title=title[title.find('>')+1:title.rfind('<')]
                else:
                    XPATH_title=res[2]
                    title=self.get_words(doc.xpath(XPATH_title).extract())    
                XPATH_mrp=res[3]
                XPATH_oldmrp=res[1]
                
                #print ('\n')
                #title 
                
                    
                #print(repr(title))
                
                #print ('\n')
                mrp=doc.xpath(XPATH_mrp).extract()
                #print (repr(mrp))
                if not mrp:
                    mrp=""
                else:
                    mrp=self.get_prices(mrp)
                    
                #print(repr(XPATH_oldmrp))
                if(XPATH_oldmrp!=''):
                    #print(repr(XPATH_oldmrp))
                    #print(repr(res[5]))    
                    oldmrp=doc.xpath(XPATH_oldmrp).extract()
                    #print(repr(oldmrp))
                    if res[5] =='Woodbrass COM':
                        checker = doc.xpath('//div[@class="mt10 fwb tup fs28-sm"]/text()').extract()
                        if not checker:
                            oldmrp=False
                    if res[5] == 'Musicstore DE':
                            if(oldmrp):
                                if(oldmrp[0].find(":")!=-1 and oldmrp[0].find(u"\u20AC")!=-1):
                                    oldmrp[0]=oldmrp[0][oldmrp[0].find(':')+1:oldmrp[0].rfind(u"\u20AC")]
                                else:
                                    oldmrp=False
                            else: 
                                oldmrp=False
                    if not oldmrp:
                        oldmrp=""
                    
                        
                    else:
                        #print("\n111\n")
                        if res[5] == 'Sonovente COM':
                            oldmrp[0]=oldmrp[2]
                        #print(repr(res[5])+"   1")
                        #print ('\n\n')
                        #print(repr(oldmrp))
                        #print ('\n\n')
                        oldmrp=self.get_prices(oldmrp)
                        
                else:
                    oldmrp=""
                XPATH_desc=res[7]
                if(XPATH_desc==""):
                    desc=""
                else:
                    desc=self.get_words(doc.xpath(XPATH_desc).extract())
                #print(repr(res[7]))
                discount=self.get_discount(oldmrp,mrp,res[6])
                try:
                    if response.request.meta['redirect_urls']:
                        url=response.request.meta['redirect_urls'][0]
                    else:
                        url=response.request.url
                except:
                    url=response.request.url
                self.url_id[url]
                #discount="2"
                status="0"
                quantity="0"
                #if(float(oldmrp)<=float(mrp)):
                #    oldmrp=""
                item['quantity'] = str(quantity)
                item['price'] = mrp
                item['old_price'] = oldmrp
                item['title'] = str(title)
                item['URL'] = url
                item['status'] = int(status)
                item['productid']=int(self.url_id[url])
                item['siteurl']=res[6]
                item['active']=res[8]
                item['desc']=desc
                item['discount']=discount
                item['currency']=res[10]
                    
                yield item
            #when the product is no longer available, checks if the page logo exists
            elif doc.xpath(res[9]).extract():
                try:
                    if response.request.meta['redirect_urls']:
                        url=response.request.meta['redirect_urls'][0]
                    else:
                        url=response.request.url
                except:
                    url=response.request.url
                item['quantity'] = "0"
                item['price'] = ""
                item['old_price'] = ""
                item['title'] = ""
                item['URL'] = url
                item['status'] = "0"
                item['productid']=int(self.url_id[url])
                item['siteurl']=res[6]
                item['active']=res[8]
                item['desc']=""
                item['discount']=""
                item['currency']=res[10]
                yield item
            # if url doesn't load
            else:
                raise ValueError('The url was empty')
        except Exception as e:
            try:
                if response.request.meta['redirect_urls']:
                    url=response.request.meta['redirect_urls'][0]
                else:
                    url=response.request.url
            except:
                url=response.request.url  
            try:  
                item['URL']=url
                item['productid']=str(self.url_id[url])
            except:
                item['URL']='url could not be retrivied'
            try:  
                item['exception']=str(e)
            except:
                item['exception']='Unknown Exception'

            yield item
        '''
    def __init__(self, *args, **kwargs):    
            super(MySpider, self).__init__(*args, **kwargs)
            '''
            with open('../Mysql_Driver_Settings.txt','r') as driver_file:
                line=""
                for line in driver_file:
                    line=line.rstrip("\n")
            self.cnxn = pyodbc.connect(line)
            self.cursor = self.cnxn.cursor()
            '''
    
    
    