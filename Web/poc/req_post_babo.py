''' req_post_babo.py - 브라우저 로그인과 동일한 post 요청 (babo 로그인) '''
import requests

url = 'http://localhost:8000/index.php'
data = {'username': 'babo', 'password': 'babo1234'}

response = requests.post(url, data=data)

print(response.text)
