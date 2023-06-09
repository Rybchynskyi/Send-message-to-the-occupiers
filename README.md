# Send message to the russian occupiers

![HTML5](https://img.shields.io/badge/html5-%23E34F26.svg?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/css3-%231572B6.svg?style=for-the-badge&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/javascript-%23323330.svg?style=for-the-badge&logo=javascript&logoColor=%23F7DF1E)
![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/mysql-%2300f.svg?style=for-the-badge&logo=mysql&logoColor=white)
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Swagger](https://img.shields.io/badge/-Swagger-%23Clojure?style=for-the-badge&logo=swagger&logoColor=white)

This is a commercial project that helps collect donations from people around the world to close the needs of the Armed Forces of Ukraine.

For the safety and uniqueness of the project, I upload only a part of the code. You can try the user experience at 
<p style="font-size:2em" align="center">
  ** https://ppo.all4ukraine.org **
</p>

## Main idea / user interface
The main idea is that people buy signatures on shells, which are then sent to the russian military "quickly and hotly."
Users who wish to sign letters have their personal cabinet, which can be made through standard authorization or social networks. In their personal account, users can:
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_1.png" width="600">
</p>
1. Create new signatures on shells and monitor the stages of sending their messages.
   During the creation of a signature, the user immediately pays for the purchase. The "Save" button becomes active only after a successful payment transaction. Additionally, using Hotjar, I noticed that users often do not know what they can sign on the shell. Therefore, I added the ability to choose a signature option from templates and, if necessary, modify it.
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_2.png" width="600">
</p>
2. Download certificates with a photo of the signature on the shell. After signing the letter, the system automatically generates a certificate that can be downloaded in JPG format to the device or shared on social networks.
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_3.png" width="600">
</p>
3. View the history of all their orders. All changes in statuses are recorded in this field.
4. Find out which requests the donations were directed to. After a successful transfer of funds to the official account of the volunteer fund, they are automatically assigned to the priority request from the main fund site. The assignment can be changed manually through the admin panel.

## Admon panel
The site has an admin panel through which you can:
1. Manage requests, including viewing, editing, and changing stages. The automation of the last stage of uploading a signed shell photo was not implemented to leave the work of closing requests to the volunteers of the fund.
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_4.png" width="600">
</p>
2. View, add, delete users, and modify their data (e.g., change their password upon request). The user's authorization method is also displayed in the user list.
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_5.png" width="600">
</p>
3. Configure the system, including batch sending of new messages to a militarys Telegram group, automatic allocation of funds to specific requests on the fund's site, and notification of new requests in a volunteers Telegram group.
<p align="center">
  <img src="https://github.com/Rybchynskyi/Images-for-readme/blob/main/PPO/ppo_pic_6.png" width="600">
</p>

The project can be considered successful. On the first day, 7 new orders were received. Next days up to now, the program ensures a stable income to the fund to close the needs of the Armed Forces of Ukraine. And thanks to automation, there are no time costs for volunteers, allowing them to focus on other tasks.
