<!-- # productTags
magento-product -tags

# interesting findings
 -> process of create schema file maybe in previous version there was php file right now they are using xml file for it in magento 2

 -> process of module registratin process is dependency injection which is configured by di.xml file 

 -> resource connection work as databse connection 

 -> module registration process in module.xml file

 -> model-resource-collection process seems kind of wired maybe for decoupling process framework build like this 

 -> magento 2 alwasys prefared for repository patter for Abstraction Between Business Logic and Data Storage

 -> routing work process : https://commerce-docs.github.io/devdocs-archive/2.0/guides/v2.0/extension-dev-guide/routing.html
 
 -> controller action class how to call a page from a route by rendaring resultPageFactory()

 -> phtml templete engine how works: A Block class (PHP) prepares data and methods for the template,The layout XML links the block class to the .phtml      template,Magento loads the .phtml file and executes the PHP inside it,The $block variable references the block instance, so it can call its methods,Any PHP logic runs, and it outputs the final HTML page sent to the browser

# chanlenges faced
    -> docker setup was good but needed adobe account so many things which kill my time (maybe due to have zero knowdledge in magento)
    -> understaing the MRC process


# refarences
    -> magento 2 best practice: https://www.icecubedigital.com/blog/complete-guide-on-magento-2-development-best-practices/
    -> chatgpt
    -> deepseek
    -> magento docs
    -> stack overflow -->


    # 🏷️ Magento 2 - Product Tags Module

A custom Magento 2 module for managing product tags through the admin panel and optionally rendering them on the frontend.

---

## 🔍 Interesting Findings

- Magento 2 uses **XML files (`db_schema.xml`)** to define database schema instead of PHP-based setup scripts used in older versions.
  
- **Module registration** involves two files:
  - `registration.php` – Registers the module with Magento
  - `etc/module.xml` – Declares module name and version

- **Dependency Injection (DI)** is configured via `etc/di.xml`, allowing Magento to auto-resolve class dependencies and bind interfaces to implementations.

- The **ResourceModel** acts as a bridge between the model and database. Magento uses a three-part pattern:  
  **Model → ResourceModel → Collection**  
  Although it may feel overly abstract, this promotes clean architecture and testability.

- Magento strongly recommends the **Repository Pattern** to abstract business logic from direct model/data layer interaction. This improves flexibility, test coverage, and clean separation.

- **Routing** is XML-based and defined in `routes.xml`. Each route maps to a controller action.
  - 📖 [Magento 2 Routing Guide](https://commerce-docs.github.io/devdocs-archive/2.0/guides/v2.0/extension-dev-guide/routing.html)

- A **Controller Action** typically returns a page using:
  ```php
  return $this->resultPageFactory->create();
