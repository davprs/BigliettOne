<form action="#" method="GET" class="createEvent">
    <ul>
        <li>
            <label for="eventTitle">Titolo:</label><input type="text" id="eventTitle" name="eventTitle"/>
        </li>
        <li>
            <label for="eventDescription">Descrizione:</label><textarea id="eventDescription" name="eventDescription" rows="5"></textarea>
            <!-- <label for="eventDescription">Descrizione:</label><input type="text" id="eventDescription" name="eventDescription"/> -->
        </li>
        <li>
            <label for="eventImg" class="eventImg">Carica copertina:</label>
            <input type="file" id="eventImg" style="display: none;" onchange="fileSelected(this)"/>
            <input type="button" id="btnAttachment" onclick="openAttachment()" value="Scegli file"/>
        </li>
        <li>
            <label for="eventPrice">Costo:</label><input type="number" id="eventPrice" name="eventPrice"/>
        </li>
        <li>
            <label for="eventPlaces">Numero posti:</label><input type="number" id="eventPlaces" name="eventPlaces"/>
        </li>
        <li>
            <label for="eventAddress">Indirizzo evento:</label><input type="text" id="eventAddress" name="eventAddress"/>
        </li>
        <li>
            <label for="eventDay">Giorno:</label><input type="date" id="eventDay" name="eventDay"/>
        </li>
        <li>
            <div class="categoryChoise">
                <span><p>Concerto</p></span>
                <span><p>Sagre</p></span>
                <span><p>Convegni</p></span>
                <span><p>Altro</p></span>
            </div>
        </li>
        <li>
            <span href="login.html" class="button submitButton" onclick="createEvent()"><p>Crea Evento</p></span>
            <!-- <input class="button" type="submit" name="submit" value="Crea evento" /> -->
        </li>
    </ul>
</form>
