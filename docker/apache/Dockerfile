FROM httpd

COPY helloworld.apache.conf /usr/local/apache2/conf/helloworld.apache.conf

RUN echo "Include /usr/local/apache2/conf/helloworld.apache.conf" \
>> /usr/local/apache2/conf/httpd.conf