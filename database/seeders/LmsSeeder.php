<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Subject;
use App\Models\Task;

class LmsSeeder extends Seeder
{
    public function run(): void
    {
        // ==================== TEACHER 1 ====================
        $csTeacher1 = User::create([
            'name' => 'Dr. Sarah Johnson',
            'email' => 's.johnson@cs.university.edu',
            'password' => Hash::make('SecureCS@2024!'),
            'is_teacher' => true,
        ]);

        // Programming Fundamentals
        $pfSubject = Subject::create([
            'name' => 'Programming Fundamentals',
            'description' => 'Introduction to programming concepts using Python',
            'code' => 'CS-PF101',
            'credit' => 4,
            'user_id' => $csTeacher1->id,
        ]);

        $pfSubject->tasks()->createMany([
            [
                'name' => 'Python Basics: Calculator Program',
                'description' => 'Create a command-line calculator in Python that can perform addition, subtraction, multiplication, and division. Handle division by zero errors.',
                'points' => 15
            ],
            [
                'name' => 'Loop Patterns',
                'description' => 'Write a Python program to print the following pattern using nested loops',
                'points' => 10
            ]
        ]);

        // Data Structures
        $dsSubject = Subject::create([
            'name' => 'Data Structures',
            'description' => 'Study of fundamental data structures and algorithms',
            'code' => 'CS-DS102',
            'credit' => 4,
            'user_id' => $csTeacher1->id,
        ]);

        $dsSubject->tasks()->createMany([
            [
                'name' => 'Linked List Implementation',
                'description' => 'Implement a singly linked list in Python/Java with methods for insertion, deletion, and traversal.',
                'points' => 20
            ],
            [
                'name' => 'Stack-Based Palindrome Checker',
                'description' => 'Use a stack data structure to determine if a given string is a palindrome.',
                'points' => 15
            ]
        ]);

        // Algorithms Analysis
        $aaSubject = Subject::create([
            'name' => 'Algorithms Analysis',
            'description' => 'Design and analysis of computer algorithms',
            'code' => 'CS-AA203',
            'credit' => 3,
            'user_id' => $csTeacher1->id,
        ]);

        $aaSubject->tasks()->createMany([
            [
                'name' => 'Sorting Algorithm Comparison',
                'description' => 'Compare the time complexity of Bubble Sort vs. Merge Sort on arrays of different sizes.',
                'points' => 25
            ],
            [
                'name' => 'Divide & Conquer Matrix Multiplication',
                'description' => 'Implement Strassen\'s algorithm and compare with standard method.',
                'points' => 30
            ]
        ]);

        // Database Systems
        $dbSubject = Subject::create([
            'name' => 'Database Systems',
            'description' => 'Relational database design and SQL programming',
            'code' => 'CS-DB204',
            'credit' => 4,
            'user_id' => $csTeacher1->id,
        ]);

        $dbSubject->tasks()->createMany([
            [
                'name' => 'Library Database Design',
                'description' => 'Design an ER diagram and implement it in SQL.',
                'points' => 25
            ],
            [
                'name' => 'Advanced SQL Queries',
                'description' => 'Write complex SQL queries for real-world scenarios.',
                'points' => 20
            ]
        ]);

        // ==================== TEACHER 2 ====================
        $csTeacher2 = User::create([
            'name' => 'Prof. Michael Chen',
            'email' => 'm.chen@cs.university.edu',
            'password' => Hash::make('CSedu$5678!'),
            'is_teacher' => true,
        ]);

        // Operating Systems
        $osSubject = Subject::create([
            'name' => 'Operating Systems',
            'description' => 'Principles of operating system design and implementation',
            'code' => 'CS-OS301',
            'credit' => 4,
            'user_id' => $csTeacher2->id,
        ]);

        $osSubject->tasks()->createMany([
            [
                'name' => 'Process Scheduling Simulator',
                'description' => 'Implement Round Robin scheduling algorithm.',
                'points' => 30
            ],
            [
                'name' => 'Memory Management Analysis',
                'description' => 'Compare paging and segmentation techniques.',
                'points' => 20
            ]
        ]);

        // Computer Networks
        $cnSubject = Subject::create([
            'name' => 'Computer Networks',
            'description' => 'Fundamentals of network architectures and protocols',
            'code' => 'CS-CN302',
            'credit' => 3,
            'user_id' => $csTeacher2->id,
        ]);

        $cnSubject->tasks()->createMany([
            [
                'name' => 'Network Topology Design',
                'description' => 'Design a LAN using Cisco Packet Tracer.',
                'points' => 25
            ],
            [
                'name' => 'TCP/IP Protocol Analysis',
                'description' => 'Analyze HTTP vs HTTPS using Wireshark.',
                'points' => 25
            ]
        ]);

        // Software Engineering
        $seSubject = Subject::create([
            'name' => 'Software Engineering',
            'description' => 'Software development lifecycle and methodologies',
            'code' => 'CS-SE303',
            'credit' => 4,
            'user_id' => $csTeacher2->id,
        ]);

        $seSubject->tasks()->createMany([
            [
                'name' => 'UML Diagram for E-Commerce System',
                'description' => 'Create sequence and class diagrams.',
                'points' => 20
            ],
            [
                'name' => 'Unit Testing Practice',
                'description' => 'Write tests for a login system.',
                'points' => 15
            ]
        ]);

        // Artificial Intelligence
        $aiSubject = Subject::create([
            'name' => 'Artificial Intelligence',
            'description' => 'Introduction to AI and machine learning concepts',
            'code' => 'CS-AI304',
            'credit' => 4,
            'user_id' => $csTeacher2->id,
        ]);

        $aiSubject->tasks()->createMany([
            [
                'name' => 'A* Pathfinding Implementation',
                'description' => 'Implement A* algorithm for maze navigation.',
                'points' => 30
            ],
            [
                'name' => 'Perceptron for AND Gate',
                'description' => 'Train a perceptron for logical AND operation.',
                'points' => 20
            ]
        ]);
    }
}