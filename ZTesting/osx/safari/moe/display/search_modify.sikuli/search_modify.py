# Call only from script

# m -> ,
# , -> ;
# ; -> m
# m -> ,
# . -> :
# : -> M
# / -> =
# = -> -
# - -> )
# ) -> 0
# 0 -> à
# ? -> +
# + -> _
# _ -> °
# % ->

import sys

path=getBundlePath()
setBundlePath(path)

nbLoopMax = int(sys.argv[4])

switchApp('Safari')

wait(Pattern("1.png").similar(0.81))

click(Pattern("GQ_.png").targetOffset(-46,-2))
type("q",KeyModifier.CMD)

if(len(sys.argv[3]) > 0):
    strLng = sys.argv[1]+"?MTLNG="+sys.argv[3]
else:
    strLng = sys.argv[1]
paste(strLng)
wait(2)
type(Key.ENTER)


switchApp('Firefox')

wait(Pattern("Firefox-1.png").similar(0.90),20)


click(Pattern("1352319434872.png").targetOffset(227,-2))

paste(sys.argv[2])
type(Key.ENTER)

wait("Connexion-1.png",5)

click("UtilisateurM.png")

paste('root')
click("Motdepasse.png")

paste('demo')
click("Excuter.png")

wait("magnctree.png",10)
click("magnctree.png")

wait("IStructureTa.png",50)


boucle = 0

while boucle < nbLoopMax:
    
    switchApp('Firefox') 
    wait("pzSQL4Reehct.png",10)
    
    click("pzSQL4Reehct.png")
    click("Excuteruneou.png")
    
    query_begin = 'SELECT MT.title, MT.`id`,ROUND( RAND( ) *100000) RANDOM FROM `mt_demo_caption` MT WHERE 1 = 1 AND LENGTH(MT.`title`) > 1 AND language = "'
    query_end = '" ORDER BY RANDOM'
    if(len(sys.argv[3]) < 1):
        strLng = "ENG"
    else:
        strLng = sys.argv[3] 
    paste(query_begin+strLng+query_end)
    click("Excuter-1.png")
    rightClick(Pattern("title.png").targetOffset(-9,19))
    click("ExaminerImen.png")
    click(Pattern("pspanspantd.png").targetOffset(-70,-4))
    doubleClick(Pattern("ytdvE.png").similar(0.80).targetOffset(27,11))
      
    # Copy label found to clipboard
    #type("q",KeyModifier.CMD)
    type("c",KeyModifier.CMD)
    
    switchApp('Safari')
    
    # Start global control view
    # English mode
    click(Pattern("l1DefaultThe.png").targetOffset(192,0))
    
    if sys.argv[3] in ["FRA"]:
        wait(Pattern("EToutdplier.png").similar(0.81),5)
    else: 
        wait(Pattern("1E1Expandall.png").similar(0.87),5)
    
    click(Pattern("QEKE1DefauIt-1.png").similar(0.90).targetOffset(188,-3))
    if sys.argv[3] in ["FRA"]:
        wait(Pattern("Rafraichir.png").similar(0.87),5)
    else:      
        wait(Pattern("QEKERafmsh.png").similar(0.95),5)
    
    click(Pattern("QEKE1DefauIt-2.png").similar(0.98).targetOffset(164,0))
    
    if sys.argv[3] in ["FRA"]:
        wait(Pattern("IIEToutrduim.png").similar(0.91),5)
    else: 
        wait(Pattern("Collapseall-1.png").similar(0.62),5) 
    
    
    click(Pattern("ME1DefauItTh.png").similar(0.86).targetOffset(174,-1))
    
    if sys.argv[3] in ["FRA"]:
        wait(Pattern("LancerIarech.png").similar(0.90),5)
    else: 
        wait(Pattern("Launchsearch.png").similar(0.92).targetOffset(-80,1),5)
    
    click(Pattern("VMQIQhemeMod.png").similar(0.90))
    
    
    type("v",KeyModifier.CMD)
    type(Key.ENTER)
 
    if sys.argv[3] in ["FRA"]:
        wait("trouvs.png",5)  
    else: 
        wait("founc.png",5)
       
    click(Pattern("l1.png").targetOffset(-58,-3))
    
    type("q",KeyModifier.CMD)
    type(Key.BACKSPACE)
    
    type(Key.ENTER)
    if sys.argv[3] in ["FRA"]:
        wait(Pattern("PasdesaisieP.png").similar(0.89))
    else: 
        wait(Pattern("Noinputclear.png").similar(0.80))
    
    
    click(Pattern("MSIEVlode1N0.png").similar(0.98))
    type("v",KeyModifier.CMD)
    click(Pattern("1DefaultThem.png").similar(0.94).targetOffset(285,0))
    

    # Clear all search result for loop
    click(Pattern("l1.png").targetOffset(-58,-3))
    
    type("q",KeyModifier.CMD)
    type(Key.BACKSPACE)
    
    type(Key.ENTER)

    boucle = boucle + 1
    print "Occurence number : "+str(boucle)

closeApp("Safari")
closeApp("Firefox")
print "Script successfully ended"
