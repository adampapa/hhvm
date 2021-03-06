<?hh

function f() {}

class C {
  public static function foo() {}
  private static function bar() {}
}

class D {
  public function foo() {}
  private function bar() {}
}

interface I {
  public function foo();
}

abstract class A {
  public function foo() {}
  abstract public function bar();
}

<<__EntryPoint>> function main(): void {
// user function
var_dump(is_callable('f'));
// builtin function
var_dump(is_callable('array_merge'));
// nonexistent function
var_dump(is_callable('asdfjkl'));
echo "\n";

// user public static method
var_dump(is_callable(array('C','foo')));
// user private static method
var_dump(is_callable(array('C','bar')));
// nonexistent static method
var_dump(is_callable(array('C','asdfjkl')));
echo "\n";

$obj = new D;
// user public instance method
var_dump(is_callable(array($obj,'foo')));
// user private instance method
var_dump(is_callable(array($obj,'bar')));
// nonexistent instance method
var_dump(is_callable(array($obj,'asdfjkl')));
echo "\n";

// user interface method
var_dump(is_callable(array('I','foo')));
// nonexistent interface method
var_dump(is_callable(array('I','asdfjkl')));
echo "\n";

// user abstract class non-abstract function
var_dump(is_callable(array('A', 'foo')));
// user abstract class abstract function
var_dump(is_callable(array('A', 'bar')));
// nonexistent abstract class method
var_dump(is_callable(array('A', 'asdfghjk')));
}
