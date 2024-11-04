<?php 
session_start(); 

$teamMembers = [
    [
        'name' => 'Kenneth Perez',
        'position' => 'Team Leader',
        'description' => "Kenneth is a fantastic team leader. He’s always clear about our goals, keeps us motivated, and makes sure we all communicate well. Plus, he handles any conflicts with ease, helping us stay focused and productive.",
        'image' => 'https://scontent.fmnl4-4.fna.fbcdn.net/v/t1.15752-9/455808581_887257063295510_5189398280353082453_n.jpg',
        'profileLink' => 'https://www.facebook.com/profile.php?id=100013606843911'
    ],
    [
        'name' => 'Angelo Miniano',
        'position' => 'Member',
        'description' => "He’s always engaged in meetings, shares useful ideas, and communicates clearly with everyone. He’s also really supportive, stepping in to help others whenever needed, and reliably gets his tasks done on time.",
        'image' => 'https://scontent.fmnl13-1.fna.fbcdn.net/v/t1.6435-9/32116516_454971068266277_7168647244223086592_n.jpg',
        'profileLink' => 'https://www.facebook.com/minianoangelo05'
    ],
    [
        'name' => 'Adrian Atilano',
        'position' => 'Member',
        'description' => "He’s always involved in discussions, contributes valuable ideas, and keeps everyone updated. Plus, he’s really supportive, always ready to help out, and consistently meets his deadlines.",
        'image' => 'https://scontent.xx.fbcdn.net/v/t1.15752-9/456469217_1024696965603651_4859132421754377920_n.jpg',
        'profileLink' => 'https://www.facebook.com/100007965338896'
    ],
    [
        'name' => 'Danilo Raphael Bayais',
        'position' => 'Member',
        'description' => "He’s fully engaged in every project, offers creative insights, and keeps the team in the loop. His enthusiasm is contagious, he’s always there to lend a hand, and you can count on him to hit every deadline.",
        'image' => 'https://scontent.fmnl4-7.fna.fbcdn.net/v/t1.15752-9/457515016_514030104370133_5694786062424629256_n.jpg',
        'profileLink' => 'https://www.facebook.com/danilo.bayais'
    ],
    [
        'name' => 'Glendelle Antonio Porlaje',
        'position' => 'Member',
        'description' => "Always proactive in meetings, Glendelle offers fresh perspectives and ensures everyone is on the same page. She’s quick to assist colleagues and consistently delivers high-quality work on schedule.",
        'image' => 'https://scontent.fmnl4-6.fna.fbcdn.net/v/t39.30808-1/420496891_2051534315215123_640933109035280586_n.jpg',
        'profileLink' => 'https://www.facebook.com/glendelleAntonioporlaje'
    ]
];

if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    setcookie("username", $name, time() + (86400 * 30), "/");
    echo "<div class='contact-form' style='padding: 20px; text-align: center;'>";
    echo "<h2>Thank You for Your Message, $name!</h2>";
    echo "<p>We have received your message and will get back to you at $email soon.</p>";
    echo "</div>";
    exit; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Profile</title>
   
</head>
<body>
    <header>
        <h1>Our Team</h1>
    </header>
    <div class="team-profile">
        <?php foreach ($teamMembers as $member): ?>
            <div class="profile">
                <img src="<?php echo $member['image']; ?>" alt="<?php echo $member['name']; ?>">
                <h2><?php echo $member['name']; ?></h2>
                <h3><?php echo $member['position']; ?></h3>
                <p><?php echo $member['description']; ?></p>
                <a href="<?php echo $member['profileLink']; ?>" target="_blank">View Profile</a>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="contact-us">
        <h2>Contact Us</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 Your Team Name. All rights reserved.</p>
        <?php 
        if (isset($_COOKIE['username'])) {
            echo "<p>Welcome back, " . htmlspecialchars($_COOKIE['username']) . "!</p>";
        }
        ?>
    </footer>
</body>
</html>