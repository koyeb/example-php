<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>D&D Spellbook</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .spell-list {
            margin: 20px 0;
        }

        .spell-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }

        .spell-item button {
            background: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .spell-item button:hover {
            background: #0056b3;
        }

        .form-group {
            margin: 10px 0;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input, select, textarea, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
        }

        button {
            background: #28a745;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>D&D Spellbook</h1>

        <!-- Spell Form -->
        <div>
            <h3>Create a Spell</h3>

            <div class="form-group" action="https://github.com/andrew5678999900/storage" method="POST">

                <label for="spellName">Spell Name:</label>
                <input type="text" id="spellName" placeholder="Enter spell name">
            </div>

            <div class="form-group">
                <label for="spellLevel">Spell Level:</label>
                <input type="number" id="spellLevel" min="0" placeholder="Enter spell level (e.g., 0 for cantrip)">
            </div>

            <div class="form-group">
                <label for="spellType">Spell Type:</label>
                <select id="spellType">
                    <option value="damage">Damage</option>
                    <option value="healing">Healing</option>
                    <option value="buff">Buff</option>
                </select>
            </div>

            <div class="form-group">
                <label for="spellEffect">Effect Value:</label>
                <input type="number" id="spellEffect" placeholder="Enter effect value (e.g., 10)">
            </div>

            <div class="form-group">
                <label for="spellDescription">Spell Description:</label>
                <textarea id="spellDescription" rows="4" placeholder="Enter a detailed description of the spell"></textarea>
            </div>

            <div class="form-group">
                <label for="spellComponents">Spell Components:</label>
                <input type="text" id="spellComponents" placeholder="Enter components (e.g., verbal, somatic, material)">
            </div>

            <button onclick="createSpell()">Add Spell</button>
        </div>

        <!-- Spell List -->
        <div class="spell-list" id="spellList">
            <h3>Spellbook</h3>
            <!-- Spells will appear here -->
        </div>
    </div>

    <script>
        // Spellbook array to store spells
        const spellbook = [];

        // Function to create a spell
        function createSpell() {
            const name = document.getElementById('spellName').value;
            const level = parseInt(document.getElementById('spellLevel').value);
            const type = document.getElementById('spellType').value;
            const effect = parseInt(document.getElementById('spellEffect').value);
            const description = document.getElementById('spellDescription').value;
            const components = document.getElementById('spellComponents').value;

            if (!name || isNaN(level) || isNaN(effect) || effect <= 0 || !description || !components) {
                alert('Please fill in all fields with valid values.');
                return;
            }

            // Create a spell object
            const spell = {
                name,
                level,
                type,
                effect,
                description,
                components,
            };

            spellbook.push(spell); // Add spell to the spellbook
            displaySpells(); // Refresh spell list
            clearForm(); // Clear input fields
        }

        // Function to display spells
        function displaySpells() {
            const spellList = document.getElementById('spellList');
            spellList.innerHTML = '<h3>Spellbook</h3>'; // Reset list

            spellbook.forEach((spell, index) => {
                // Create spell item
                const spellItem = document.createElement('div');
                spellItem.className = 'spell-item';

                spellItem.innerHTML = `
                    <div>
                        <strong>${spell.name}</strong> (Level ${spell.level})<br>
                        <em>Type:</em> ${spell.type}, <em>Effect:</em> ${spell.effect}<br>
                        <em>Description:</em> ${spell.description}<br>
                        <em>Components:</em> ${spell.components}
                    </div>
                    <button onclick="castSpell(${index})">Cast</button>
                `;

                spellList.appendChild(spellItem);
            });
        }

        // Function to clear form inputs
        function clearForm() {
            document.getElementById('spellName').value = '';
            document.getElementById('spellLevel').value = '';
            document.getElementById('spellType').value = 'damage';
            document.getElementById('spellEffect').value = '';
            document.getElementById('spellDescription').value = '';
            document.getElementById('spellComponents').value = '';
        }

        // Function to cast a spell
        function castSpell(index) {
            const spell = spellbook[index];
            let message = `✨ You cast ${spell.name} (Level ${spell.level})!\n`;

            switch (spell.type) {
                case 'damage':
                    message += `🔥 It dealt ${spell.effect} damage!`;
                    break;
                case 'healing':
                    message += `💚 It healed ${spell.effect} HP!`;
                    break;
                case 'buff':
                    message += `💪 It granted a ${spell.effect} point buff!`;
                    break;
                default:
                    message += `The spell takes effect!`;
            }

            alert(`${message}\n\nDescription: ${spell.description}\nComponents: ${spell.components}`);
        }
    </script>
    
</body>
</html>
