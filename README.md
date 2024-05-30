# GhostShell 
The Tiny Web Shell Stager is a lightweight and efficient web shell written in PHP, designed to stealthily deploy and operate within a web environment. This tool leverages PHP's DNS functions to retrieve additional web shell functionality dynamically, enhancing its flexibility and reducing its footprint. It includes a number of features to ensure both security and concealment.

## Features:

* **DNS-Based Payload Extraction**: Utilizes PHP's dns_get_record function to dynamically retrieve and decode base64-encoded payloads from DNS TXT records. This method ensures that the core functionality of the web shell remains minimal and can be extended or modified without altering the main script.

* **Access Control with Passphrase**: Ensures secure access to the web shell functionalities. Only users who provide the correct secret passphrase can utilize the tool, preventing unauthorized access.
  ![image](https://github.com/lawrenceamer/ghostshell/assets/10256911/f28ea8e4-be74-451a-bd59-1fc4a2529879)


* **Stealth Mode**: Mimics a 404 HTTP response when accessed without the secret passphrase. This feature hides the presence of the web shell from casual inspection and automated scanners, enhancing its stealth capabilities.
![image](https://github.com/lawrenceamer/ghostshell/assets/10256911/afbe6397-6bd4-43b7-ab5b-c24fcd4edead)

## Usage Scenario:

Ideal for penetration testers and security researchers, the Tiny Web Shell Stager can be deployed in environments where maintaining a low profile is crucial. Its innovative use of DNS-based payload extraction makes it adaptable and reduces the need for frequent updates to the core script.

## Example Workflow:

**Deployment**: Upload the Tiny Web Shell Stager (home.php) to the target web server.

**Configuration**: Ensure DNS TXT records are set up with staged base64-encoded payload "remote.txt" with 250 length for each record, you need split the payload into multiple chunks, and assure the each chunk has a host value in alphabetical order 
![image](https://github.com/lawrenceamer/ghostshell/assets/10256911/331f0f29-30cd-4b6f-9684-c68719b418e4)
**Access**: Navigate to the web shell and provide the secret passphrase to unlock the advanced functionalities.
![image](https://github.com/lawrenceamer/ghostshell/assets/10256911/ccc10edb-718b-4557-a7a4-089f313ff4a4)
**Stealth**: When accessed without the correct passphrase, the tool will return a 404 HTTP response, blending in with standard error pages.
By incorporating these features, the Tiny Web Shell Stager provides a robust and covert tool for secure remote access and command execution in web environments.
![image](https://github.com/lawrenceamer/ghostshell/assets/10256911/22d13ba6-5d29-4a15-855b-6f91acc0781b)


