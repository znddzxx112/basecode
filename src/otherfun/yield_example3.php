<?php

$some_state = 'initial';

function gen() {
    global $some_state;

    echo "gen() execution start\n";
    $some_state = "changed";

    yield 1;
    yield 2;

    
}

function peek_state() {
    global $some_state;
    echo "\$some_state = $some_state\n";
}

echo "calling gen()...\n";
$result = gen();
echo "gen() was called\n";

peek_state();

echo "iterating...\n";
foreach ($result as $val) {
    echo "iteration: $val\n";
    peek_state();
}

/**
 * yeild
 * 含有yield关键字的函数被调用时候和普通函数不同，他不执行函数代码，而是返回一个generator对象，这个对象是可迭代对象，具有next()方法，调用一次next方法执行到yield那里的时候暂停一下，返回一次计算的值(用法类似return)，当再次调用next()方法时，接着yield下面代码循环执行知直到又碰到yield，返回下一个循环计算的值。。。这样不就动态生成值了么，一次一个不占内存。碰到这个词的时候大概就是告诉程序，来我要生成个generator对象并返回了。 
 */
/**
 * calling gen()...
 * gen() was called
 * $some_state = initial
 * iterating...
 * gen() execution start
 * iteration: 1
 * $some_state = changed
 * iteration: 2
 * $some_state = changed
 */