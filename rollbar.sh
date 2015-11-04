ACCESS_TOKEN=600b332fbab1410b952db6fa7dec6f39
ENVIRONMENT=development
LOCAL_USERNAME=`RudyJessop`
REVISION=`git log -n 1 --pretty=format:"%H"`
COMMENT= `Test`

curl https://api.rollbar.com/api/1/deploy/ \
  -F access_token=$ACCESS_TOKEN \
  -F environment=$ENVIRONMENT \
  -F revision=$REVISION \
  -F local_username=$LOCAL_USERNAME