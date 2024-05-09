<?

    if (isset($_GET['shoot'])) {
        $coords = explode('x', $_GET['shoot']);
      header('Location: /'); //redirect to the main page
      // print($coords[0]);
      // print($coords[1]);

    }

