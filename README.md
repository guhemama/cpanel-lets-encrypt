# Cpanel Let's Encrypt

This script let's you generate Let's Encrypt certificates for your websites
hosted with Cpanel - actually for any website. The only dependencies are PHP 5.3+, curl
and OpenSSL.

This script is a modified version of https://github.com/analogic/lescript.

# Usage

1. Clone or download the repository somewhere in your webserver.
2. Generate a pair of RSA keys.
3. Export you private key to the PEM format, name it as `account.pem` and move it
the script directory.

```
openssl rsa -in account.key -outform pem > account.pem
```

4. Open the run.php file, and update the `$domainWebroots` array. The array keys
are the domains you want to generate the certificate for and the array values are
the domain web root directories (they are needed to create the ACME challenge files).
5. Run the file with `php run.php` or through your browser.
6. If everything was successful you will now see a directory named `certs`.
7. Go to Cpanel's _SSL/TLS_ section, then to _Install and Manage SSL for your site_.
8. Select your website URL.
9. Copy and paste the contents of the file `cert.pem` into the field _Certificate: (CRT)_,
the contents of `private.pem` into _Private Key (KEY)_ and the contents of `chain.pem`
into _Certificate Authority Bundle: (CABUNDLE)_ (if needed).
10. Click _Install Certificate_ and enjoy your Let's Encrypt certificate. :P