##################
# Docker compose
##################

.PHONY: stop
stop:
	@docker compose stop

.PHONY: up
up:
	@docker compose up -d

.PHONY: att
att:
	@docker compose up

.PHONY: ps
ps:
	@docker compose ps

.PHONY: down
down:
	@docker compose down

.PHONY: build
build:
	@docker compose build

##################
# SSH in docker
##################

.PHONY: ssh
ssh:
	@docker compose exec -it php bash
