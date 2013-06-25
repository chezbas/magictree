path=getBundlePath()
setBundlePath(path)

Settings.ObserveScanRate = 0.5 # Every 2 seconds

# Start video recording
switchApp('iShowU HD')
wait(Pattern("vancEnreqist.png").targetOffset(13,1),20)
click(Pattern("vancEnreqist.png").targetOffset(13,1))

flagRun = "R"
#popup("Start")

def handler(e):
    click("1352353947300.png")

def endOfScript(e):
    global flagRun
    #RegScreen.stopObserver()
    #secondScreen.stopObserver()
    flagRun = "S"

def bounceFinder(e):
    switchApp('Finder')

regBounce = Region(1271,863,169,37)
regBounce.ObserveScanRate = 5 # 5 Hz
regBounce.onAppear("F1.png", bounceFinder)
regBounce.observe(FOREVER, background = True)


RegScreen = Region(181,117,1115,729)


RegScreen.onAppear("LQErreurdexc.png", handler)
RegScreen.observe(FOREVER, background = True)

secondScreen = Region(0,254,687,588)

secondScreen.onAppear("thisistheend.png", endOfScript)
secondScreen.observe(FOREVER, background = True)


switchApp('Terminal')
wait("Terminal.png",5)
type("n",KeyModifier.CMD)

paste('/Volumes/www/magictree/ZTesting/osx/safari/moe/display/test_plan2')
type(Key.ENTER)


while (flagRun == "R"):
    wait(1)

# End video recording
#switchApp('iShowU HD')
click("1352409860790.png")
click("ArrterIacapt.png")
click(Pattern("1352409860790.png").similar(0.92))
click("ArrterIacapt.png")

#type("2",KEY_SHIFT | KEY_CMD)
#popup("Fin")