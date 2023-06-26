# Laravel Package Shopit

<p align="center"><a href="https://naykel.com.au" target="_blank"><img src="https://avatars0.githubusercontent.com/u/32632005?s=460&u=d1df6f6e0bf29668f8a4845271e9be8c9b96ed83&v=4" width="120"></a></p>

<a href="https://packagist.org/packages/naykel/packagit"><img src="https://img.shields.io/packagist/dt/naykel/packagit" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/naykel/packagit"><img src="https://img.shields.io/packagist/v/naykel/packagit" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/naykel/packagit"><img src="https://img.shields.io/packagist/l/naykel/packagit" alt="License"></a>

# NAYKEL SHOPIT

E-commerce package for NayKel Laravel applications

## Installation

To get started, install Shopit using the Composer package manager:

    composer require naykel/shopit

## Things to Know

- Prices are stored in the database as cents
- Prices are converted to dollars when fetched from the database and set back to cents when persisted
- Cart total stored in session as dollars and can be passed directly into the payment gateways as
  dollars
