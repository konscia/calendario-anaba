# Geração QR Code Calendário Anabá

Os Qr Codes tem a função de direcionar para um arquivo de áudio específico de cada mês do ano.
Os códigos deverão ser gerados para o domínio de internet https://calendarioanaba.com.br

## Geração dos Códigos

Parar gerar os códigos utiliza-se os seguintes comandos em um Linux / Ubuntu

```
sudo apt get install qrencode

qrencode -o 1-jan.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/jan"
qrencode -o 2-fev.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/fev"
qrencode -o 3-mar.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/mar"
qrencode -o 4-abr.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/abr"
qrencode -o 5-mai.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/mai"
qrencode -o 6-jun.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/jun"
qrencode -o 7-jul.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/jul"
qrencode -o 8-ago.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/ago"
qrencode -o 9-set.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/set"
qrencode -o 10-out.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/out"
qrencode -o 11-nov.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/nov"
qrencode -o 12-dez.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/dez"
```

 
