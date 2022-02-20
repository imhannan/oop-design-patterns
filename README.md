# SOLID Design patterns
- Single Responsibility Principle (SRP)
- Open/Closed Principle
- Liskov’s Substitution Principle (LSP)
- Interface Segregation Principle (ISP)
- Dependency Inversion Principle (DIP)

## Single Responsibility Principle
###### This principle states that “a class should have only one reason to change” which means every class should have a single responsibility or single job or single purpose.

## Open/Closed Principle
###### This principle states that “software entities (classes, modules, functions, etc.) should be open for extension, but closed for modification” which means you should be able to extend a class behavior, without modifying it.

## Liskov’s Substitution Principle (LSP)
###### The principle was introduced by Barbara Liskov in 1987 and according to this principle “Derived or child classes must be substitutable for their base or parent classes“. This principle ensures that any class that is the child of a parent class should be usable in place of its parent without any unexpected behavior.

## Interface Segregation Principle (ISP)
###### It states that “do not force any client to implement an interface which is irrelevant to them“. Here your main goal is to focus on avoiding fat interface and give preference to many small client-specific interfaces.

## Dependency Inversion Principle (DIP)
###### Two key points are here to keep in mind about this principle
1. High-level modules/classes should not depend on low-level modules/classes. Both should depend upon abstractions.
2. Abstractions should not depend upon details. Details should depend upon abstractions.