''' req_get_cookie.py - post 요청 보낼때 저장된 쿠키 얻기 '''
import requests

url = 'http://localhost:8000/index.php'
data = {'username': 'babo', 'password': 'babo1234'}

response = requests.post(url, data=data, allow_redirects=False)

cookies = response.cookies

print(cookies)

for cookie in cookies:
    print(f"{cookie.name}: {cookie.value}")
