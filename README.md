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

**Module Name:** `Strativ_ProductTags` (renamed to `Hassan_Tags`)  
**Purpose:** Manage custom product tags via admin panel and optionally display on the storefront.

---

## 🔍 Key Findings & Learnings

### 🧱 Magento Module Structure & Registration

- **Module Registration:**
  - `registration.php` — Registers module with Magento.
  - `etc/module.xml` — Declares the module’s name and version.

- **Dependency Injection:**
  - Configured in `etc/di.xml`.
  - Binds interfaces to implementations and controls object lifecycle.

---

### 🗃️ Database Schema & Resource Connection

- **Database Schema:**
  - Defined using `db_schema.xml`.
  - Replaces legacy install/upgrade PHP scripts from Magento 1.

- **Resource Model:**
  - Connects model to database via Magento’s DB abstraction.
  - `Model → ResourceModel → Collection` pattern ensures separation of concerns.

---

### 🔁 Repository Pattern

- Used for abstraction between business logic and data storage.
- Promotes:
  - Decoupling
  - Testability
  - Clean service contracts
- Example:
  ```php
  $this->tagRepository->save($tag);
