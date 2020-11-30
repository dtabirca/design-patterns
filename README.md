##Creational

- Singleton https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/Singleton.php
- Factory Method https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/FactoryMethod.php

##Sources

https://www.script-tutorials.com/design-patterns-in-php/

https://buihuycuong.medium.com/the-23-gang-of-four-design-patterns-974ae8d1a957

https://refactoring.guru/design-patterns/php

https://designpatternsphp.readthedocs.io/en/latest/Creational/README.html

https://webmobtuts.com/backend-development/creating-classes-with-php-factory-abstract-factory-simple-and-static-factory-patterns/

https://en.wikipedia.org/wiki/Builder_pattern

https://designpatternsphp.readthedocs.io/en/latest/Creational/SimpleFactory/README.html

https://github.com/domnikl/DesignPatternsPHP

https://phptherightway.com/


**SHORT

CREATIONAL PATTERNS
As a developer, we spend most of our time on creating classes and objects. Those patterns below can be used to get the job done effectively.

Name - Purpose

Abstract Factory - Creates an instance of several families of classes/	families of product objects

Builder	- Separates object construction from its representation/ how a composite object gets created

Factory Method - Creates an instance of several derived classes. / subclass of object that is instantiated

Object Pool - Avoid expensive acquisition and release of resources by recycling objects that are no longer in use.

Prototype - A fully initialized instance to be copied or cloned./class of object that is instantiated

Singleton - A class of which only a single instance can exist./ 	the sole instance of a class


STRUCTURAL PATTERNS
If you want to form larger structures from different classes and objects as well as provide new functionalities to them, structures design patterns are all what you need. They consist of the following patterns:

Name - Pattern

Adapter	- Match interfaces of different classes./	interface to an object

Bridge	- Separates an object’s interface from its implementation./ 	implementation of an object

Composite - A tree structure of simple and composite objects./ 	structure and composition of an object

Decorator -	Add responsibilities to objects dynamically./responsibilities of an object without subclassing

Facade	- A single class that represents an entire subsystem./ interface to a subsystem

Flyweight -	A fine-grained instance used for efficient sharing./storage costs of objects

Private Class Data - Restricts accessor/ mutator access.

Proxy - An object representing another object./how an object is accessed; its location


BEHAVIORAL PATTERNS
Behavioral design patterns really come into play if you want to deal with communication between objects. They consist of the following patterns:

Name - Purpose

Chain of Responsibility	- A way of passing a request between a chain of objects./object that can fulfill a request

Command	Encapsulate a command request as an object./when and how a request is fulfilled

Interpreter	A way to include language elements in a program./grammar and interpretation of a language

Iterator	Sequentially access the elements of a collection./how an aggregate’s elements are accessed, traversed

Mediator	Defines simplified communication between classes./how and which objects interact with each other

Memento	Capture and restore an object’s internal state./what private information is stored outside an object, and when

Null Object	Designed to act as a default value of an object.

Observer	A way of notifying change to a number of classes./number of objects that depend on another object; how the dependent objects stay up to date

State	Alter an object’s behavior when its state changes./states of an object

Strategy	Encapsulates an algorithm inside a class./
Template Method

Template Method	Defer the exact steps of an algorithm to a subclass.

Visitor	Defines a new operation to a class without change./operations that can be applied to object(s) without changing their class(es)