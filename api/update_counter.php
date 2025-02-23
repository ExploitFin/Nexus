const express = require('express');
const app = express();
const port = process.env.PORT || 3000;

// For parsing application/json
app.use(express.json());

let runCount = 0;

app.post('/api/updateCount', (req, res) => {
  // Optionally, validate the request (e.g., check an API key)
  runCount++; // Increment your counter
  res.json({ message: "Count updated", runCount: runCount });
});

app.get('/api/getCount', (req, res) => {
  res.json({ runCount: runCount });
});

app.listen(port, () => {
  console.log(`Server running on port ${port}`);
});
