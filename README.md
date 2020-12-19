## A collection of practical examples with explanations for a better understanding of design patterns

> S = Single Responsibility Principle. A class should have only one reason to change. Every class should only have responsibility over a single part of the functionality. 
> O = Open/Closed Principle. Open for extension, but closed for modification. Write classes that implement and adhere to interfaces, then type-hint against those interfaces. 
> L = The Liskov Substitution Principle. It states that child classes should never break the parent class type definitions (Subtypes must be substitutable for their base types). 
> I = The Interface Segregation Principle. No client should be forced to depend on methods it does not use. Use small, concept-specific interfaces. 
> D = The Dependency Inversion Principle. Do not depend upon concretions; depend upon abstractions instead. Dependencies should be interfaces/contracts or abstract classes rather than concrete implementations.

## Sources

https://en.wikipedia.org/wiki/Software_design_pattern  
https://phptherightway.com/  
https://designpatternsphp.readthedocs.io/  
https://refactoring.guru/design-patterns  
https://sourcemaking.com/design_patterns  
https://www.script-tutorials.com/design-patterns-in-php/  
https://en.wikipedia.org/wiki/Anti-pattern  

## Creational

- Singleton - unique instance of a class - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/Singleton.php
- Factory Method - an object for creating other objects - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/FactoryMethod.php https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/SimpleFactory.php https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/StaticFactory.php
- Abstract Factory - collections of factories - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/AbstrctFactory.php
- Builder - complex objects step by step - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/Builder.php
- Object Pool - recycling objects - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/ObjectPool.php
- Prototype - ready to be cloned - https://github.com/dtabirca/design-patterns/blob/master/patterns/creational/Prototype.php

## Structural

- Adapter (Wrapper/Translator/Gateway) - converts interfaces - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Adapter.php
- Bridge	- separates abstraction from implementation - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Bridge.php
- Composite - tree structures - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Composite.php
- Decorator -	add new behavior by wrapping - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Decorator.php
- Data Mapper - transfer between data storage and memory - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/DataMapper.php
- Facade	- interface to a subsystem - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Facade.php
- Dependency Injection - inject instead of creating - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/DependencyInjection.php
- Flyweight -	minimise memory, share common parts - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Flyweight.php
- Fluent Interface - chain method calls - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/FluentInterface.php
- Proxy - substitute object with access to the original - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Proxy.php
- Registry - central storage for objects, singleton - https://github.com/dtabirca/design-patterns/blob/master/patterns/structural/Registry.php

## Behavioral

- Chain of Responsibility - pass the request along the chain until an object handles it - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/ChainOfResponsibility.php
- Command - encapsulate request as an object, queue, log, undo - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Command.php
- Interpreter	- grammar and interpretation of a language - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Interpreter.php
- Iterator - sequentially access the elements of a collection - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Iterator.php
- Mediator - encapsulate objects interaction - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Mediator.php
- Memento	- capture and restore an object’s internal state - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Memento.php
- Null Object	- a default value of an object - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/NullObject.php
- Observer (Publish/subscribe) - one-to-many change notification - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Observer.php
- Specification - check objects against clear business rules - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Specification.php
- State - alter object’s behavior when its state changes - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/State.php
- Strategy - encapsulates algorithms in classes - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Strategy.php
- Template Method - skeleton of an algorithm, deferring steps to subclasses - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/TemplateMethod.php
- Visitor	- a new operation to a class without change - https://github.com/dtabirca/design-patterns/blob/master/patterns/behavioral/Visitor.php

## Other

Concurrency patterns - multi-threaded  
Lazy initialization - delay the creation of an object - check Singleton, Proxy  
Front controller - centralized entry point for handling requests  
Servant - helper class defining common functionality for a group of classes  
Active Record - wrap a row of a database table in an object  
Repository pattern - communication layer between the application and data source, with powerful querying capabilities  (Mediates between the domain and data mapping layers using a collection-like interface for accessing domain objects.)
Active Object - a list of one time runnable commands  
Monostate Object - dynamic public methods to get/set static private variables  
Service Locator is considered an anti-pattern, hides class dependencies instead of exposing them as you would do using the Dependency Injection.
EAV -The Entity–attribute–value (EAV) model is a data model to describe entities where the number of attributes (properties, parameters) that can be used to describe them is potentially vast, but the number that will actually apply to a given entity is relatively modest.
