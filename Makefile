all: cs phpa dunit unit
travis: cs phpa unit-travis
contrib: cs phpa dunit unit

init:
	if [ ! -d vendor ]; then composer install; fi;

cs: init
	./vendor/bin/phpcs --standard=PSR2 src/

phpa: init
	./vendor/bin/phpa src/

unit: init
	./vendor/bin/phpunit --coverage-text --coverage-html covHtml

unit-travis: init
	./vendor/bin/phpunit --coverage-text --coverage-clover ./build/logs/clover.xml

dunit: init
	./vendor/bin/dunit

travis-coverage: init
	if [ -f ./build/logs/clover.xml ]; then wget https://scrutinizer-ci.com/ocular.phar && php ocular.phar code-coverage:upload --format=php-clover ./build/logs/clover.xml; fi
