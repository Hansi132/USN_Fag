package com.hanskristian;

import java.io.IOException;

public class Main {

    public static void main(String[] args) {

    }

    public static void task1() {
        String str = "HiH";
        str = str.concat(String.valueOf(str.charAt(str.length() - 1)));


        System.out.println(str);
    }

    public static void task2() {
        String str = "Hello";
        str = str.charAt(str.length() - 1) + str.substring(1, str.length() - 1) + str.charAt(0);

        System.out.println(str
        );
    }

    public static void task3() {
        String str1 = "Hello";
        String str2 = "llo";
        boolean b;

        b = str1.endsWith(str2);

        System.out.println(b);
    }

    public static void task5() {
        int a = 4;
        int b = 6;
        boolean result;
        result = a == 6 || b == 6 || a + b == 6 || a - b == 6 || b - a == 6;
    }

    public static void task6() {
        int n = 33;
        boolean result;
        result = n % 11 == 0 || n % 11 == 1;
    }

    public static void task7() {
        String str = "fib";
        boolean result;

        result = str.startsWith("f") && str.endsWith("b");
    }

    public static void task8() {
        int a = 1;
        int b = 2;
        int c = 4;
        boolean bOk = true;
        boolean result;
        if (bOk == true) {
            result = b < c;
        } else {
            result = a < b && b < c;
        }

    }

}
