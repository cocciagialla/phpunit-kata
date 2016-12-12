- Install composer if you haven't it;
- run `composer install`
- Always write tests before code!

To execute tests and coverage:
- `vendor/bin/phpunit --color tests/`
- `vendor/bin/phpunit --coverage-html coverage tests/`

**FizzBuzz**

Given a series of numbers:
- if divisible by 3 replace with Fizz
- if divisible by 5 replace with Buzz
- if divisible by 3 nad 5 replace with FizzBuzz

**Calc Stats**

Your task is to process a sequence of integer numbers
to determine the following statistics:

- minimum value
- maximum value
- number of elements in the sequence
- average value (precision 6)

For example: [6, 9, 15, -2, 92, 11]

- minimum value = -2
- maximum value = 92
- number of elements in the sequence = 6
- average value = 21.833333

**Template Engine**

Write a “template engine” to transform template strings, “Hello {name}” into “instanced” strings. To do that a variable->value mapping must be provided. For example, if name=”Cenk” and the template string is “Hello {name}” the result would be “Hello Cenk”.

- Put code in a separate folder. For example under /TemplateEngine

- Should evaluate template single variable expression:
  - `mapOfVariables.put(“name”,”Cenk”);`
  - `templateEngine.evaluate(“Hello {name}”, mapOfVariables);`
  - should evaluate to “Hello Cenk”

- Should evaluate template with multiple expressions:
  - `mapOfVariables.put(“firstName”,”Cenk”);`
  - `mapOfVariables.put(“lastName”,”Civici”);`
  - `templateEngine.evaluate(“Hello {firstName} {lastName}”, mapOfVariables);`
  - should evaluate to “Hello Cenk Civici”
  
- Should evaluate template with repeated expressions:
  - `mapOfVariables.put(“firstName”,”Cenk”);`
  - `mapOfVariables.put(“lastName”,”Civici”);`
  - `templateEngine.evaluate(“Hello {firstName} {lastName}. Your name is {firstName}”, mapOfVariables);`
  - should evaluate to “Hello Cenk Civici. Your name is Cenk”  

- Should give error if template variable does not exist in the map:
  - map empty
  - `templateEngine.evaluate(“Hello {firstName} “, mapOfVariables);`
  - should throw MissingValueException

- Should accept external template file from db (assume to use a TemplateDAO):
  - `templateEngine.evaluateFromDB(templateFileName, mapOfVariables);`