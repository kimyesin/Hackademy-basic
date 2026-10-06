''' poc_404.py - 존재하지 않는 엔드포인트로 get 요청 보내기 (404) '''
import requests

url = 'http://localhost:8000/none.php'

response = requests.get(url)

print(response)
