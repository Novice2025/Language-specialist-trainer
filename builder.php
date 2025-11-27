<?php
// builder.php - Lesson Planner
require_once 'db.php'; // Include the database connection

$message = '';

// Handle form submission to add new lessons
if (¨D_SERVER['REQUEST_METHOD'] === 'POST' && isset(¨D_POST['action']) && ¨D_POST['action'] === 'add_lesson') {
    $title = ¨D_POST['title'] ?? '';
    $language_level = ¨D_POST['language_level'] ?? '';
    $industry = ¨D_POST['industry'] ?? '';
    $chunks = ¨D_POST['chunks'] ?? '';
    $vocabulary = ¨D_POST['vocabulary'] ?? '';
    $logic = ¨D_POST['logic'] ?? '';
    $example_sentences = ¨D_POST['example_sentences'] ?? '';
    $focus = ¨D_POST['focus'] ?? ''; // This is the new 'focus' area

    // Basic validation
    if (empty($title)) {
        $message = '<p class="error">Lesson title cannot be empty.</p>';
    } else {
        try {
            $stmt = $pdo->prepare("INSERT INTO licoes (title, language_level, industry, chunks, vocabulary, logic, example_sentences, focus) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$title, $language_level, $industry, $chunks, $vocabulary, $logic, $example_sentences, $focus]);
            $message = '<p class="success">Lesson added successfully!</p>';
        } catch (PDOException $e) {
            $message = '<p class="error">Error adding lesson: ' . $e->getMessage() . '</p>';
        }
    }
}

// Fetch all lessons from the database
$lessons = [];
try {
    $stmt = $pdo->query("SELECT * FROM licoes ORDER BY id DESC");
    $lessons = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $message = '<p class="error">Error fetching lessons: ' . $e->getMessage() . '</p>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LexiPro: Lesson Builder</title>
    <style>
        /* Global Dark Mode Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #1a1a2e; /* Dark background */
            color: #e0e0e0; /* Light text */
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 1000px;
            margin: 20px auto;
            background: #2a2a4a; /* Slightly lighter dark for container */
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
            padding: 30px;
        }
        h1, h2 {
            color: #8be9fd; /* Accent color for headings */
            text-align: center;
            margin-bottom: 30px;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 1px solid #444;
        }
        .form-group {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 8px;
            color: #c0c0c0;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        select {
            padding: 10px 12px;
            border: 1px solid #444;
            border-radius: 6px;
            background-color: #3e3e5c; /* Input background */
            color: #e0e0e0; /* Input text color */
            font-size: 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        input[type="text"]:focus,
        textarea:focus,
        select:focus {
            border-color: #bd93f9; /* Focus border color */
            outline: none;
            box-shadow: 0 0 0 3px rgba(189, 147, 249, 0.3); /* Focus shadow */
        }
        textarea {
            min-height: 80px;
            resize: vertical;
        }

        /* Custom Dropdown Colors for Dark Mode */
        select {
            /* Basic appearance reset */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            /* Add arrow icon */
            background-image: url('data:image/svg+xml;utf8,<svg fill="%23e0e0e0" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/><path d="M0 0h24v24H0z" fill="none"/></svg>');
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 20px;
            padding-right: 35px; /* Make space for the arrow */
        }

        /* Option Group and Option styling for dark mode readability */
        select option {
            background-color: #3e3e5c; /* Option background */
            color: #e0e0e0; /* Option text */
        }
        select optgroup {
            background-color: #2a2a4a; /* Optgroup background */
            color: #8be9fd; /* Optgroup text */
            font-weight: bold;
        }


        button[type="submit"] {
            grid-column: span 2; /* Span across both columns */
            padding: 12px 25px;
            background-color: #bd93f9; /* Vibrant accent color */
            color: #1a1a2e;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        button[type="submit"]:hover {
            background-color: #ff79c6; /* Another vibrant accent on hover */
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .message {
            margin-bottom: 20px;
            padding: 10px 15px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }
        .success {
            background-color: #388e3c; /* Green for success */
            color: #e0e0e0;
        }
        .error {
            background-color: #d32f2f; /* Red for error */
            color: #e0e0e0;
        }

        .lesson-list {
            margin-top: 40px;
        }
        .lesson-card {
            background: #3e3e5c; /* Card background */
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            border-left: 5px solid #bd93f9; /* Accent border */
        }
        .lesson-card h3 {
            color: #ff79c6; /* Card title accent */
            margin-top: 0;
            margin-bottom: 10px;
        }
        .lesson-card p {
            margin: 5px 0;
            font-size: 0.95rem;
            color: #d0d0d0;
        }
        .lesson-card p strong {
            color: #8be9fd; /* Key label accent */
            margin-right: 5px;
        }
        .no-lessons {
            text-align: center;
            color: #c0c0c0;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LexiPro: Lesson Builder 🚀</h1>
        <p style="text-align: center; color: #c0c0c0; margin-bottom: 30px;">Design your "Lego Chain Block" lessons and advanced vocabulary modules here. Focus on the core logic and impact.</p>

        <?php if (!empty($message)): ?>
            <div class="message <?php echo strpos($message, 'success') !== false ? 'success' : 'error'; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <h2>Add New Lesson</h2>
        <form method="POST">
            <input type="hidden" name="action" value="add_lesson">

            <div class="form-group">
                <label for="title">Lesson Title:</label>
                <input type="text" id="title" name="title" placeholder="e.g., Enhancing Business Communication" required>
            </div>

            <div class="form-group">
                <label for="language_level">Language Level:</label>
                <select id="language_level" name="language_level">
                    <option value="">Select Level</option>
                    <option value="A1">A1 - Beginner</option>
                    <option value="A2">A2 - Elementary</option>
                    <option value="B1">B1 - Intermediate</option>
                    <option value="B2">B2 - Upper Intermediate</option>
                    <option value="C1">C1 - Advanced</option>
                    <option value="C2">C2 - Proficiency</option>
                </select>
            </div>

            <div class="form-group">
                <label for="industry">Industry Focus:</label>
                <select id="industry" name="industry">
                    <option value="">General Professional</option>
                    <optgroup label="Specific Industries">
                        <option value="Finance">Finance</option>
                        <option value="Quality">Quality Assurance</option>
                        <option value="Production">Production & Manufacturing</option>
                        <option value="Sales">Sales & Marketing</option>
                        <option value="Management">Management & HR</option>
                        <option value="IT">IT & Tech</option>
                        <option value="Logistics">Logistics & Supply Chain</option>
                        <option value="Legal">Legal</option>
                        <option value="Healthcare">Healthcare</option>
                    </optgroup>
                </select>
            </div>

            <div class="form-group">
                <label for="focus">Focus Area (e.g., Public Speaking, Negotiation, Report Writing):</label>
                <input type="text" id="focus" name="focus" placeholder="e.g., Negotiation Strategies">
            </div>

            <div class="form-group">
                <label for="chunks">Key Lexical Chunks (comma separated):</label>
                <textarea id="chunks" name="chunks" placeholder="e.g., drive results, foster collaboration, manage expectations"></textarea>
            </div>

            <div class="form-group">
                <label for="vocabulary">Target Vocabulary (comma separated, e.g., enhance, optimize, mitigate):</label>
                <textarea id="vocabulary" name="vocabulary" placeholder="e.g., enhance, optimize, mitigate, leverage"></textarea>
            </div>

            <div class="form-group">
                <label for="logic">Logic Behind Learning (Why they should learn this & how it connects):</label>
                <textarea id="logic" name="logic" placeholder="e.g., 'Enhance' implies positive refinement, more formal than 'improve'."></textarea>
            </div>

            <div class="form-group">
                <label for="example_sentences">Example Sentences (one per line):</label>
                <textarea id="example_sentences" name="example_sentences" placeholder="e.g., We need to enhance our process efficiency.\nThe new software will optimize our data analysis."></textarea>
            </div>

            <button type="submit">Add Lesson</button>
        </form>

        <h2>Existing Lessons</h2>
        <div class="lesson-list">
            <?php if (!empty($lessons)): ?>
                <?php foreach ($lessons as $lesson): ?>
                    <div class="lesson-card">
                        <h3><?php echo htmlspecialchars($lesson['title']); ?></h3>
                        <p><strong>Level:</strong> <?php echo htmlspecialchars($lesson['language_level'] ?? 'N/A'); ?></p>
                        <p><strong>Industry:</strong> <?php echo htmlspecialchars($lesson['industry'] ?? 'General'); ?></p>
                        <p><strong>Focus:</strong> <?php echo htmlspecialchars($lesson['focus'] ?? 'N/A'); ?></p>
                        <p><strong>Chunks:</strong> <?php echo htmlspecialchars($lesson['chunks']); ?></p>
                        <p><strong>Vocabulary:</strong> <?php echo htmlspecialchars($lesson['vocabulary']); ?></p>
                        <p><strong>Logic:</strong> <?php echo htmlspecialchars($lesson['logic']); ?></p>
                        <p><strong>Examples:</strong> <?php echo nl2br(htmlspecialchars($lesson['example_sentences'])); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-lessons">No lessons added yet. Get started!</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
