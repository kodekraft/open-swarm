# Swarm
Swarm is a benchmark utility that allows you to stress test a web service endpoint. The user defines the test within a single JSON file.

## Installation
Swarm installs using composer. Add the following entry to your `repositories` section:

```
    "repositories": [
        {
            "type": "vcs",
            "url": "git@whus-git:package/swarm.git"
        }
    ],
```

From terminal, run the following command in the root of your project:
```
composer require pds/swarm --dev
```

## Usage
To swarm, open a terminal to execute your test.
```
./vendor/bin/swarm load {file}
```
