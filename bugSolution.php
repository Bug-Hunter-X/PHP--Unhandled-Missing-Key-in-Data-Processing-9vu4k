```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return []; // Return an empty array if the input is empty
  }

  $processedData = [];
  foreach ($data as $item) {
    // Use array_key_exists for safer key checking
    if (array_key_exists('value', $item)) {
      $processedData[] = $item['value'];
    } else {
      // Handle cases where 'value' is missing gracefully
      error_log('Missing "value" key in item: ' . json_encode($item)); // Log the issue
      $processedData[] = null; // Or a more suitable default value
    }
  }
  return $processedData;
}

$data = [
  ['value' => 1],
  ['value' => 2],
  ['value' => 3],
  ['value' => 4],
  ['anotherKey' => 5]
];

$result = processData($data);
print_r($result);
```