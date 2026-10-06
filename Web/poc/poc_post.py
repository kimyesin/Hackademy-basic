''' poc_post.py - index.php 에 post 요청 보내기 (grape 로그인) '''
import requests

url = 'http://localhost:8000/index.php'
payload = {'username': 'grape', 'password': 'secret1234'}

response = requests.post(url, data = payload)

print(response.text)
