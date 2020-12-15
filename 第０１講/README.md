# Lesson 1



## Preparation

Install net-tools

```
$ sudo apt install net-tools
```

Installing apache

```
$ sudo apt-get install apache2
```

Installing MySQL 

```
$ sudo apt install mysql-server
$ sudo mysql_secure_installation utility
    Password Validation? n 
    Remove anonymous users? y
    Disallow root login remotely? y
    Remove test database and access to it? n
    Reload privilege tables? y
```

Installing PHP 

```
$ sudo apt install php libapache2-mod-php
```


```
$ sudo apt-get update -y
$ sudo apt-get install -y php-pdo-mysql
$ sudo systemctl restart apache2
```


### VS Code

Preparing RSA key for ssh: 

Start powershell
```
$ cd ~/.ssh
$ cat id_rsa.pub
ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABAQCigqyoDMdIR99RwwlsfUVjnwhR4zLJEmQG9+0yjYrdzUdhlJIzIC+csMQQdjoPAePHLFMrDW+4sO5qMr+hmraiVrnZsZUI2G02ZU0OnzSjYo2iIh40973Y9I1HHUqtSplkCeft5HG7BR6D6ZMLPS561bmDXwqQA9yLvy0dTgR9u/d4aTXToojf4K/B5cK1UyIKFnqIg68tCvbZo0yt773XtDjMZsksKdWSGadkbIeWvBN3E7O36MiDhOE6gQH3zu++YC1rsYI0FddOLV7zs7WfouvAJIPUt6KmxMZYi9cHRtyC5k1W2DA2i+rMrljdjdmwrUoqkSBakbmpJqXpY/t9 shion@DESKTOP-PUN3L96
```
Copy the whole output. Now open multipass
```
ubuntu@primary:~$ nano ./.ssh/authorized_keys
```
Right click once to paste the rsa key. Now you can ssh. 



Install VS Code ssh plugin 
