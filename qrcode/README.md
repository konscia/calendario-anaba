# Geração QR Code Calendário Anabá

Os Qr Codes tem a função de direcionar para um arquivo de áudio específico de cada mês do ano.
Os códigos deverão ser gerados para o domínio de internet https://calendarioanaba.com.br

## Geração dos Códigos

Parar gerar os códigos utiliza-se os seguintes comandos em um Linux / Ubuntu

```
sudo apt get install qrencode

qrencode -o 1-jan.png -s 40 -m 2 -l M -v 2 "https://calendarioanaba.com.br/2021/jan"
```

 
