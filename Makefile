# Copyright 2022 Christian Gimenez

# Author: Christian Gimenez   

# Makefile

# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation, either version 3 of the License, or
# (at your option) any later version.

# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.

# You should have received a copy of the GNU General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.

SERVER_HOST=127.0.0.1
SERVER_PORT=8001

all: haml coffee

haml:
	haml create.haml > create.html

coffee:
	coffee -c js/*.coffee

serve:
	@echo "Server at $(SERVER_HOST):$(SERVER_PORT)"
	php -S $(SERVER_HOST):$(SERVER_PORT)
