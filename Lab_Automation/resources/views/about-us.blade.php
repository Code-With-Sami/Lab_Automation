@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="styles.css">
    <style>
       
        section {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #D10024;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        .choose li {
            background: #D10024;
            color: white;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }
       
    </style>
<section id="intro">
        <h2>Welcome to Our Company</h2>
        <p>We are dedicated to delivering high-quality services and solutions to meet your needs. Our passion for innovation and excellence drives us forward.</p>
    </section>

    <section id="mission-vision">
        <h2>Our Mission & Vision</h2>
        <p><strong>Mission:</strong> To provide top-notch solutions that empower businesses and individuals.</p>
        <p><strong>Vision:</strong> To be a leading company recognized for quality, integrity, and innovation.</p>
    </section>

    <section id="why-choose-us">
        <h2>Why Choose Us?</h2>
        <ul class="choose">
            <li>Experienced and passionate team</li>
            <li>Customer-focused approach</li>
            <li>Innovative and effective solutions</li>
            <li>Commitment to quality and excellence</li>
        </ul>
    </section>

    <section id="team">
        <h2>Meet Our Team</h2>
        <p>Our team consists of dedicated professionals who bring their expertise and passion to everything we do.</p>
    </section>

@endsection