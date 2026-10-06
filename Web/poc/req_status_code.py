''' req_status_code.py - 리다이렉트(302) 상태코드와 헤더 확인 '''
import requests

url = 'http://localhost:8000/index.php'
data = {'username': 'babo', 'password': 'babo1234'}

response = requests.post(url, data=data, allow_redirects=False)

print(response.headers)
print(response.status_code)
