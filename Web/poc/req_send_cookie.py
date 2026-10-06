''' req_send_cookie.py - 쿠키를 포함해서 request 보내기 '''
import requests

url = 'http://localhost:8000/page-babo.php'

cookies = {
    'user':'babo_dg'
}

response = requests.get(url, cookies=cookies,allow_redirects=False)

print(response.text)
