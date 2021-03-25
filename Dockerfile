FROM php:7.4-cli-alpine

RUN mkdir -p /app
COPY *.php /app/

ADD entrypoint.sh /
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]
