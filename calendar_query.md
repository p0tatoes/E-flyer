# Quries days of the month and total orders for each day, based on month

_gets total orders and days of month for May (05)_

```SQL
SELECT DATE_FORMAT(date, '%d') AS day_of_month, COUNT(*) AS total_orders FROM purchases WHERE DATE_FORMAT(date, '%m')=05 GROUP BY day_of_month
```
