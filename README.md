Lift House Design's Project Template
====================================

This is the framework that Lift House Design builds our application with. It is essentially CodeIgniter 2.1.3 with extra functionality that we've either found and added or tailored ourselves. We are constantly innovating to make it a more versatile tool with one goal: the ability to QUICKLY and EFFICIENTLY build SCALABLE and MAINTAINABLE web applications.

Requirements
------------

The current (known) requirements to run all the features in the project template are:

* Apache 2 (or another web server capable of using PHP such as NGINX)
* PHP 5.1.6 +
* CodeIgniter 2.1.3 (and associated requirements)

The Basics
----------

The Project Template is *mostly* comprised of 4 components:

* CodeIgniter ([view documentation][codeigniter-docs])
* Extended parent controller component based on Jamie Rumbelow's `codeigniter-base-controller` with modifications ([view documentation][controller-docs])
* Extended parent model component based on Jamie Rumbelow's `codeigniter-base-model` with modifications ([view documentation][model-docs])
* Various extensions, components, libraries and helpers we have added as we've gone along that we've seen a potential for re-use (documentation below)

New Projects
------------

When starting a new project, you should start by forking the Project Template into a repository designated for your project. You will have all the re-useable components of the framework, and your specific application will be isolated to it's own repository so that the Project Template remains in tact.

Contributing
------------

If you are working on a project, and you identify a useful piece of functionality that could be used in other projects and is abstract enough to do so, then great! We also appreciate documentation, whether that be by modifying this file, or contributing PHPDoc documentation on features we may not yet have done so. You may contribute one of two ways:

 * Fork the Project Template, implement your feature, and submit a Pull Request
 * If you already have access to the Project Template repository, you can create a branch, implement your feature in it, and submit a Pull Request

 > NOTE: Never push directly into master. We frown upon that here at Lift
 > House Design as all branch merges *should* be peer reviewed before doing so.

 Documentation
 =============

 You should first be very familiar with the CodeIgniter, and also go through Jamie Rumbelow's [codeigniter-base-controller][controller-docs] and [codeigniter-base-model][model-docs] documentation to understand how they work and understand why we use them.

 All done? Great! Here are the (documented) features we have added to the Project Template. Any section marked with `@TODO` have known missing documentation.

 `@TODO: Document missing features`

 Environment Auto-detection
 --------------------------

 CodeIgniter features environment-specific configuration files, which is great! The problem is that changing that environment involves editing the entry script (index.php), which upsets Git. It's not a huge deal, but just another added convenience of using the Project Template

 


[codeigniter-docs]:https://ellislab.com/codeigniter/user-guide/
[controller-docs]:https://github.com/jamierumbelow/codeigniter-base-controller
[model-docs]:https://github.com/jamierumbelow/codeigniter-base-model